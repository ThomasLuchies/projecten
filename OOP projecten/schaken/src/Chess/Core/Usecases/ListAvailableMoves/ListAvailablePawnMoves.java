package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Pieces.Piece;
import Chess.Core.Color;

import java.util.HashSet;

/**
 * Analyses all available moves for the pawn on the specified location.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 */
public abstract class ListAvailablePawnMoves extends ListAvailableMoves
{
    protected Board board;
    protected Coords location;
    protected Piece piece;
    protected HashSet<Coords> availableMoves;

    public HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        this.availableMoves = new HashSet<>();
        if (!board.pieceOnField(location))
            return availableMoves;

        this.piece = board.getPiece(location);
        if (!(piece instanceof Pawn))
            return availableMoves;

        if (!correctPieceColor(piece.getColor()))
            return availableMoves;

        this.board = board;
        this.location = location;

        if (!reachedEndOfBoard())
            if (noBlockingPiece(1))
                addMoves();

        var rightTargetDestination = getRightTargetDestination();
        if (isOppositePiece(board, piece.getColor(), rightTargetDestination))
            availableMoves.add(rightTargetDestination);

        var leftTargetDestination = getLeftTargetDestination();
        if (isOppositePiece(board, piece.getColor(), leftTargetDestination))
            availableMoves.add(leftTargetDestination);

        addEnPassantIfPossible(getRightTargetDestination());
        addEnPassantIfPossible(getLeftTargetDestination());

        return availableMoves;
    }

    private void addMoves()
    {
        availableMoves.add(getForwardDestination(1));
        if (noBlockingPiece(2) && piece.getMoves() == 0)
            availableMoves.add(getForwardDestination(2));
    }

    private void addEnPassantIfPossible(Coords destination) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var onEnPassantRow = onEnPassantRow();
        if (!onEnPassantRow)
            return;

        var targetPieceDestination = getEnPassantTargetDestination(destination);
        if (!board.pieceOnField(targetPieceDestination))
            return;

        var targetPiece = board.getPiece(targetPieceDestination);
        if (targetPiece.getMoves() != 1)
            return;

        var isOppositePiece = piece.getColor() != targetPiece.getColor();
        if (isOppositePiece)
            availableMoves.add(destination);
    }

    /**
     * Determines whether the specified pawn is the right color.
     *
     * @param color The color of the specified pawn.
     * @return True if correct color, false otherwise.
     */
    protected abstract boolean correctPieceColor(Color color);

    /**
     * Gets the coords if the pawn is available to move forward on the board.
     *
     * @param rows the amount of rows the pawn moves forward.
     * @return The forward destination.
     */
    protected abstract Coords getForwardDestination(int rows);

    /**
     * Gets the destination of the piece that can be taken on the right.
     *
     * @return The coords of the piece that can be taken.
     */
    protected abstract Coords getRightTargetDestination();

    /**
     * Gets the destination of the piece that can be taken on the left.
     *
     * @return The coords of the piece that can be taken.
     */
    protected abstract Coords getLeftTargetDestination();

    /**
     * Gets the destination of the piece that can be taken on the left.
     *
     * @return The coords of the piece that can be taken.
     */
    protected abstract Coords getEnPassantTargetDestination(Coords destination);

    /**
     * Determines wheter the specified pawn is positioned on the en-passant row.
     *
      * @return True if on the row, false otherwise.
     */
    protected abstract boolean onEnPassantRow();

    /**
     * Determines if there is no piece blocking the way of the pawn.
     *
     * @param rows The row the blocking piece can be on.
     * @return True if no piece is blocking, false otherwise.
     */
    protected abstract boolean noBlockingPiece(int rows);

    /**
     * Determines if the specified pawn reached the end of the board.
     *
     * @return True if on the end, false otherwise.
     */
    protected abstract boolean reachedEndOfBoard();
}