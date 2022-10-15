package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Piece;
import Chess.Core.Pieces.Queen;
import Chess.Core.Pieces.Rook;
import Chess.Core.Usecases.LocateKing.LocateKing;

public class IsCheckedByRookOrQueen extends IsChecked
{
    @Override
    public boolean execute(Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var kingLocation = locateKing.locate(board, color);
        var left = isCheckedLeft(kingLocation, board, color);
        var right = isCheckedRight(kingLocation, board, color);
        var above = isCheckedAbove(kingLocation, board, color);
        var under = isCheckedUnder(kingLocation, board, color);
        return left || right || above || under;
    }

    private boolean isCheckedLeft(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x >= 1)
            if (isOppositeRookOrQueen(--x, y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedRight(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (x <= 8)
            if (isOppositeRookOrQueen(++x, y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedAbove(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (y <= 8)
            if (isOppositeRookOrQueen(x, ++y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isCheckedUnder(Coords kingLocation, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var x = kingLocation.x();
        var y = kingLocation.y();
        while (y >= 1)
            if (isOppositeRookOrQueen(x, --y, board, color))
                return true;
            else if (pieceOnField(board, x, y))
                return false;
        return false;
    }

    private boolean isOppositeRookOrQueen(int x, int y, Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var coords = new Coords(x, y);
        if (!board.pieceOnField(coords))
            return false;
        var piece = board.getPiece(coords);
        var isRook = piece instanceof Rook;
        var isQueen = piece instanceof Queen;
        return (isRook || isQueen) && piece.getColor() != color;
    }

    private boolean pieceOnField(Board board, int x, int y)
    {
        var coords = new Coords(x,y);
        return board.pieceOnField(coords);
    }
}