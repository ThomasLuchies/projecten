package Chess.Core;

import Chess.Core.Pieces.DummyPiece;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertThrows;

public class FieldTests
{
    @Test
    public void CanThrowNoPieceAvailableWhenNull()
    {
        var field = new Field(null);
        assertThrows(Field.NoPieceAvailable.class, field::getPiece);
    }

    @Test
    public void CanGetPiece() throws Field.NoPieceAvailable
    {
        var piece = new DummyPiece(Color.white);
        var field = new Field(null, piece);
        assertEquals(piece, field.getPiece());
    }
}