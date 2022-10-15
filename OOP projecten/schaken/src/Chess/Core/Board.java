package Chess.Core;

import Chess.Core.Pieces.*;

import java.util.HashMap;
import java.util.HashSet;

/**
 * Represents a chess board.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public class Board
{
    public static class FieldNotFound extends Exception
    {
        public FieldNotFound()
        {
            super("Field not found.");
        }
    }

    private final HashSet<Field> fields;
    private final HashSet<Piece> takenPieces;

    public Board()
    {
        this.fields = new HashSet<>();

        for (var x = 1; x <= 8; ++x)
            for (var y = 1; y <= 8; ++y)
                this.fields.add(new Field(new Coords(x, y)));

        this.takenPieces = new HashSet<>();
    }

    public Board(HashSet<Field> fields)
    {
        this.fields = fields;
        this.takenPieces = new HashSet<>();
    }

    public HashSet<Piece> getTakenPieces()
    {
        return takenPieces;
    }

    public HashSet<Field> getFields()
    {
        return fields;
    }

    /**
     * Returns whether the specified location has a piece on its square.
     *
     * @param location The location where the piece is placed at.
     * @return True if the square has a piece on it, false otherwise.
     */
    public boolean pieceOnField(Coords location)
    {
        Field field;
        try
        {
            field = getField(location);
        }
        catch (Board.FieldNotFound e)
        {
            return false;
        }
        return field.pieceOnField();
    }

    /**
     * Returns a piece placed on the specified location.
     *
     * @param location The location where the piece is placed at.
     * @return The piece placed on the location.
     */
    public Piece getPiece(Coords location) throws FieldNotFound, Field.NoPieceAvailable
    {
        return getField(location).getPiece();
    }

    /**
     * Places the specified piece on the specified location.
     * If there is already a piece on the field it will be added to the taken pieces and overridden on the field.
     *
     * @param location The location where the piece should be placed.
     */
    public void setPiece(Coords location, Piece piece) throws FieldNotFound, Field.NoPieceAvailable
    {
        var field = getField(location);
        if (field.pieceOnField())
            takenPieces.add(field.getPiece());
        field.setPiece(piece);
    }

    /**
     * Removes the specified piece from the specified location.
     *
     * @param location The location where the piece is placed at.
     */
    public void removePiece(Coords location) throws FieldNotFound
    {
        getField(location).removePiece();
    }

    /**
     * Gets the field on the specified location.
     *
     * @param location The location of the field.
     * @return The field on the location.
     * @throws FieldNotFound When there is no field found.
     */
    public Field getField(Coords location) throws FieldNotFound
    {
        for (var field : fields)
            if (field.getCoords().equals(location))
                return field;
        throw new FieldNotFound();
    }

    public HashMap<Piece, Coords> getUnmovedPieces(Color color) throws Field.NoPieceAvailable
    {
        HashMap<Piece, Coords> unmovedPieces = new HashMap<>();
        for(Field field : fields)
        {
            if(field.pieceOnField() && field.getPiece().getMoves() == 0 && field.getPiece().getColor().equals(color))
            {
                unmovedPieces.put(field.getPiece(), field.getCoords());
            }
        }
        return unmovedPieces;
    }


    /**
     * Resets the board to the original start position of chess.
     *
     * @throws FieldNotFound When a field is not found on the board.
     */
    public void reset(PromotionHandler promotionHandler) throws FieldNotFound, Field.NoPieceAvailable
    {
        for(var field : getFields())
            field.removePiece();

        setPiece(new Coords(1, 1), new Rook(Color.white, this));
        setPiece(new Coords(2, 1), new Knight(Color.white, this));
        setPiece(new Coords(3, 1), new Bischop(Color.white, this));
        setPiece(new Coords(4, 1), new Queen(Color.white, this));
        setPiece(new Coords(5, 1), new King(Color.white, this));
        setPiece(new Coords(6, 1), new Bischop(Color.white, this));
        setPiece(new Coords(7, 1), new Knight(Color.white, this));
        setPiece(new Coords(8, 1), new Rook(Color.white, this));

        for(var n = 1; n < 9; n++)
            setPiece(new Coords(n, 2), new Pawn(Color.white, this, promotionHandler));

        setPiece(new Coords(1, 8), new Rook(Color.black, this));
        setPiece(new Coords(2, 8), new Knight(Color.black, this));
        setPiece(new Coords(3, 8), new Bischop(Color.black, this));
        setPiece(new Coords(4, 8), new Queen(Color.black, this));
        setPiece(new Coords(5, 8), new King(Color.black, this));
        setPiece(new Coords(6, 8), new Bischop(Color.black, this));
        setPiece(new Coords(7, 8), new Knight(Color.black, this));
        setPiece(new Coords(8, 8), new Rook(Color.black, this));

        for(var n = 1; n < 9; n++)
            setPiece(new Coords(n, 7), new Pawn(Color.black, this, promotionHandler));

        this.takenPieces.clear();
    }
}